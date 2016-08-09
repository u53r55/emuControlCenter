<?php
require_once('cItem2.php');

/**
 * protected _variable
 * 	dont add var to autogenerated queries
 * protected _variable_
 * 	dont use in checksum
 *
 */
class EccMeta extends Item {
	
	protected $type = 1; // 1 = meta for computer/console roms!
	protected $eccident = '';
	protected $crc32 = '';
	protected $title = '';
	protected $fname = '';
	protected $fsize = 0;
	protected $data = '';
	protected $lang = '';
	protected $year = '';
	protected $cat = 0;
	protected $rating = 0;
	
	protected $usk = '';
	protected $developer = '';
	
	protected $publisher = '';
	protected $storage = 0;
	protected $statistics = '';
	
	protected $cdate = '';
	protected $remote_adress = '';
	protected $eccvers = '';
	protected $cstime = '';
	protected $csid = '';
	
	/**
	 * use this var only, if you want to add the
	 * checksum into the database ... there is a _dcs in item!
	 */
	protected $dcs = false;
	
	protected $_validPlatforms = array();
	
	protected $_storageTypes = array(
		0 => '',
		1 => 'Not possible',
		2 => 'Battery',
		3 => 'Password / Code',
		4 => 'Memory (Card)',
	);
	
	protected $_validCategories = array(
		0 => "",
		1 => "Action",
		2 => "Adventure",
		3 => "Arcade",
		4 => "Beat'em Up",
		5 => "Board",
		6 => "Card Game",
		7 => "Casino",
		8 => "Compilation",
		9 => "Demo",
		10 => "Dictionary",
		11 => "Educational",
		12 => "Fighting",
		13 => "Fishing",
		14 => "Flight Sim",
		15 => "FPS",
		16 => "Hardware",
		17 => "Hunting",
		18 => "Intro",
		19 => "Logical",
		20 => "Mahjong",
		21 => "Mini-Games",
		22 => "Music",
		23 => "Party",
		24 => "Pinball",
		25 => "Jump n Run 2D",
		26 => "Puzzle",
		27 => "Racing",
		28 => "RPG",
		29 => "Shoot'em Up",
		30 => "Shooting",
		31 => "Simulation",
		32 => "Slot Machine",
		33 => "Sports",
		34 => "Strategy",
		35 => "Tool",
		36 => "Video",
		37 => "XXX",
		38 => "Ball & Paddle",
		39 => "BIOS",
		40 => "Boat Race",
		41 => "Maze",
		42 => "Misc.",
		43 => "Quiz",
		44 => "Tabletop & Board",
		45 => "Unplayable",
		46 => "Billiard",
		48 => "Sports/Baseball",
		49 => "Sports/Basketball",
		50 => "Sports/Bowling",
		51 => "Sports/Boxing",
		52 => "Sports/Darts",
		53 => "Sports/Dodgeball",
		54 => "Sports/Fishing",
		55 => "Sports/Football American",
		56 => "Sports/Soccer",
		57 => "Sports/Rugby",
		58 => "Sports/Golf",
		59 => "Sports/Hockey",
		60 => "Sports/Horse",
		61 => "Sports/Pool",
		62 => "Sports/Skateboarding",
		63 => "Sports/Skiing",
		64 => "Sports/Sumo",
		65 => "Sports/Swimming",
		66 => "Sports/Tennis",
		67 => "Sports/Track & Field",
		68 => "Sports/Volleyball",
		69 => "Sports/Wrestling",
		70 => "Action Adventure",
		71 => "Trading Simulation",
		72 => "3D Shooter",
		73 => "Ego Shooter",
		74 => "Sports/other",
		75 => "Jump n Run 3D",
	);
	
	public function __construct() {
		$this->_validPlatforms = $this->setValidPlatforms();
	}
	
	private function setValidPlatforms() {
		$ini = file_get_contents('../inc/ecc_navigation.php');
		$ini = ($ini) ? unserialize($ini) : array();
		return $ini;
	}
	
	public function isValid() {
		
		# these fields are not needed for a checksum!!!
		$checksumFilter = array('fname', 'cdate', 'cstime', 'dcs', 'csid', 'remote_adress');
		$this->dcs = $this->createItemChecksum($checksumFilter);

		$this->validateEccident($this->eccident);

		//if (!VALID::string($this->crc32, 8, 8, "/^[A-Z0-9]*$/")) $this->addError('crc32', 'NOT_VALID');
		if (!$this->validCrc32($this->crc32)) $this->addError('crc32', 'NOT_VALID');
		if (!VALID::string($this->title, 255)) $this->addError('title', 'NOT_VALID');
		if (!VALID::string($this->fname, 255)) $this->addError('fname', 'NOT_VALID');
		
		if (!VALID::string($this->data, 255, 0, "/^[0-9\.]*$/")) $this->addError('data', 'NOT_VALID');
		if (!VALID::string($this->lang, 255, 0, "/^[A-Z\.]*$/")) $this->addError('lang', 'NOT_VALID');
		
		if (!VALID::int($this->usk, 0, 21)) {
			$this->usk = 'NULL';
		}
		if (!VALID::string($this->developer, 255)) $this->addError('developer', 'NOT_VALID');
		if (!VALID::string($this->publisher, 255)) $this->addError('publisher', 'NOT_VALID');
		
		if (!VALID::int($this->cat, 0, 100)) $this->addError('cat', 'NOT_VALID');
		
		if (!VALID::string($this->year, 4, 0, "/^[0-9]*$/")) {
			$this->year = 'NULL';
		}
		
		if (!VALID::string($this->statistics, 128, 0, "/^[0-9\.\-]*$/")) $this->statistics = 'NULL';
		
		if (!VALID::int($this->storage, 0, 100)) $this->addError('cat', 'NOT_VALID');
		
		if (!VALID::string($this->fsize, 15, 0, "/^[0-9\.\,]*$/")) $this->addError('fsize', 'NOT_VALID');
		
		if (!VALID::int($this->rating, 0, 6)) $this->addError('rating', 'NOT_VALID');
		if (!VALID::string($this->eccvers, 7, 3, "/^[0-9\.]*$/")) $this->addError('eccvers', 'NOT_VALID');
		
		if (!$this->cdate) return false;;
		if (!$this->remote_adress || !VALID::string($this->remote_adress, 15, 7, "/^[0-9\.]*$/")) $this->addError('remote_adress', 'NOT_VALID');
				
		if (!$this->hasErrors()) {
			
			if (!VALID::string($this->csid, 8, 8, "/^[0-9A-Z\.]*$/")) {
				$this->addError('csid', 'NOT_VALID');
			}
			else {
				if ($this->csid == '........') {
					$this->csid = $this->getNewSessionKey();
				}
				else {
					$this->updateSessionKey($this->csid);
				}
			}
		}
		else {
			if (DEBUG) {
				print "<pre>";
				print_r($this->getErrors());
				print "</pre>";
			}
		}
		
		return !$this->hasErrors();
	}
	
	public function validateEccident($eccident) {
		if (!VALID::string($eccident, 10, 2, "/^[a-z0-9]*$/")) $this->addError('eccident', 'NOT_VALID');
		if (!in_array($eccident, array_keys($this->_validPlatforms))) $this->addError('eccident', 'NOT_VALID_IN_ARRAY');
		return !$this->hasErrors();
	}
	
	public function validCrc32($crc32) {
		return (VALID::string($crc32, 8, 8, "/^[A-Z0-9]*$/")) ? true : false;
	}
	
	public function getCategoryById($categoryId) {
		return (isset($this->_validCategories[$categoryId])) ? $this->_validCategories[$categoryId] : false;
	}
	
	public function getPlatformByEccident($eccident) {
		$platformName = 'unknown';
		if (isset($this->_validPlatforms[$eccident])) $platformName = $this->_validPlatforms[$eccident];
		$ret = array();
		$ret['eccident'] = $eccident;
		$ret['name'] = $platformName;
		return $ret;
	}
	
	public function getStorageType($storageId) {
		return (isset($this->_storageTypes[$storageId])) ? $this->_storageTypes[$storageId] : false;
	}
	
	public function getValidPlatforms() {
		return $this->_validPlatforms;
	}
	
	private function getNewSessionKey() {
		while(true) {
			$csid = sprintf('%08X', crc32(microtime().$this->cdate.$this->remote_adress.$this->cstime));
			$q ="INSERT INTO `romdb_client_session` (`csid`, `cdate`, `cstime`, `remote_adress`) VALUES ('".$csid."', ".(int)time().", ".DBMS::qs($this->cstime).", ".DBMS::qs($this->remote_adress).")";			
			try {
				DBMS::query($q);
				return $csid;
			}
			catch (Exception $e) {}
		}
		return false;
	}
	
	private function updateSessionKey() {
		$csid = sprintf('%08X', crc32(time().$this->cdate.$this->remote_adress.$this->cstime));
		$q ="UPDATE `romdb_client_session` SET `cdate` = ".(int)time().", `cstime` = ".DBMS::qs($this->cstime).", `remote_adress` = ".DBMS::qs($this->remote_adress)."  WHERE `csid` = ".DBMS::qs((string)$this->csid);
		DBMS::query($q);
	}
	
}
?>