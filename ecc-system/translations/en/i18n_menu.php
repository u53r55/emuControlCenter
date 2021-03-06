<?
/**
 * emuControlCenter language system file
 * ------------------------------------------
 * language:en (english)
 * author:	andreas scheibel
 * date:	2006/09/09
 * ------------------------------------------
 */
$i18n['menu'] = array(
	// -------------------------------------------------------------
	// context menu navigation
	// -------------------------------------------------------------
	'lbl_platform%s' =>
		"%s options",
	'lbl_roms_add%s' =>
		"Add new ROMS for %s",
	'lbl_roms_optimize%s' =>
		"Optimize ROMS",
	'lbl_roms_remove%s' =>
		"Remove ROMS",
	'lbl_roms_remove_dup%s' =>
		"Remove duplicate ROMS",
	'lbl_emu_config' =>
		"Edit/Assign emulator",
	'lbl_ecc_config' =>
		"Configuration",
	'lbl_dat_import_ecc' =>
		"Import emuControlCenter DATfile",
	'lbl_dat_import_rc' =>
		"Import RomCenter DATfile",
	'lbl_dat_export_ecc_full' =>
		"Export ECC DATfile full",
	'lbl_dat_export_ecc_user' =>
		"Export ECC DATfile user",
	'lbl_dat_export_ecc_esearch' =>
		"Export ECC DATfile e-search",
	'lbl_dat_empty' =>
		"Empty Datfile database",
	'lbl_help' =>
		"Help",
	// -------------------------------------------------------------
	// context menu main
	// -------------------------------------------------------------
	'lbl_start' =>
		"Start ROM",
	'lbl_fav_remove' =>
		"Remove this bookmark",
	'lbl_fav_all_remove' =>
		"Remove ALL bookmarks",
	'lbl_fav_add' =>
		"Add to bookmarks",
	'lbl_image_popup' =>
		"Open imageCenter",
	'lbl_img_reload' =>
		"Reload images",
	'lbl_rom_remove' =>
		"Remove ROM from DB",
	'lbl_meta_edit' =>
		"EDIT METADATA",
	'lbl_roms_initial_add%s%s' =>
		"No ROMS found for platform\n----------------------------------------\n%s (%s)\n----------------------------------------\nClick here to add new ROMS!",
	'lbl_meta_webservice_meta_get' =>
		"Get data from eccdb (Internet)",
	'lbl_meta_webservice_meta_set' =>
		"Add your data to eccdb (Internet)",
	// File operations
	'lbl_shellop_submenu' =>
		"File operations",
	'lbl_shellop_browse_dir' =>
		"Browse ROM directory",
	'lbl_shellop_file_rename' =>
		"Rename file on harddisk",
	'lbl_shellop_file_copy' =>
		"Copy file on harddisk",
	'lbl_shellop_file_unpack' =>
		"Unpack this file",
	'lbl_shellop_file_remove' =>
		"Remove file from harddisk",
	// Rating
	'lbl_rating_submenu' =>
		"Rate ROM",
	'lbl_import_submenu' =>
		"Import DAT file",
	'lbl_export_submenu' =>
		"Export DAT file",
	'lbl_rom_rescan_folder' =>
		"(Re)parse ROM-Directory",
	'lbl_meta_remove' =>
		"Remove META from DB",
	'lbl_rating_unset' =>
		"Unset ratings",

	/* 0.9 FYEO 9*/
	'lbl_roms_remove_dup_preview%s' =>
		"Find duplicate ROMS",
	/* 0.9 FYEO 9*/
	'lbl_roms_dup' =>
		"Duplicate ROMS",

	/* 0.9.1 FYEO 3*/
	'lbl_img_remove_all' =>
		"Remove ROM images",
	/* 0.9.1 FYEO 4*/
	'lbl_meta_compare_left' =>
		"COMPARE - Select left side",
	'lbl_meta_compare_right%s' =>
		"COMPARE to \"%s\"",

	/* 0.9.2 FYEO 2*/
	'lbl_start_with' =>
		"Start ROM with...",
	'lbl_emu_config' =>
		"Configure emulator",
	'lbl_quickfilter' =>
		"QuickFilter",
	'lbl_quickfilter_reset' =>
		"Reset quickFilter",

	/* 0.9.6 FYEO 1 */
	'lbl_dat_import_ecc_romdb' =>
		"Import romDB Datfile (internet)",

	/* 0.9.6 FYEO 8 */
	'lContextRomSelectionAddNewRoms%s' =>
		"Add new %s roms",
	'lContextRomSelectionRemoveRoms%s' =>
		"Remove all %s roms",
	'lContextMetaRemove' =>
		"Remove ROM metadata",

	/* 0.9.6 FYEO 11 */
	'lbl_importDatCtrlMAME' =>
		"Import CLR MAME DATfile",

	/* 0.9.6 FYEO 13 */
	'labelRomAuditInfo' =>
		"Show rom audit info",
	'labelRomAuditReparse' =>
		"Updated rom audit infos",
	'lbl_roms_rescan_all' =>
		"Rescan all rom folders",
	'lbl_roms_add' =>
		"Add new roms",

	/* 0.9.6 FYEO 11 */
	'lbl_open_eccuser_folder%s' =>
		"Open eccUser-Folder (%s)",
	'lbl_rom_remove_toplevel' =>
		"Remove rom(s)",
	'menuItemPersonalEditNote' =>
		"Edit notes",
	'menuItemPersonalEditReview' =>
		"Edit review",

	/* 0.9.6 FYEO 11 */
	'menuItemRomOptions' =>
		"Rom options",

	/* 0.9.7 FYEO 17 */
	'imagepackTopMenu' =>
		"imagepack helpers",
	'imagepackRemoveImagesWithoutRomFile' =>
		"Remove images for roms that i dont have in database",
	'imagepackRemoveEmptyFolder' =>
		"Remove empty folder",
	'imagepackCreateAllThumbnails' =>
		"Create thumbnails for faster access",
	'imagepackRemoveAllThumbnails' =>
		"Remove thumbnails for imagepack exchange",
	'imagepackConvertEccV1Images' =>
		"Convert flat images to new imagepack structure! (V1->V2)",

	/* 0.9.7 FYEO 17 */
	'onlineSearchForRom' =>
		"Search for ROM on internet (google)",
	'onlineEccRomdbShowWebInfo' =>
		"Search for rom in romdb",

	/* 0.9.8 FYEO 04 */
	'lbl_meta_edit_top' =>
		"Edit meta",

	/* 0.9.9 FYEO 01 */
	'lblOpenAssetFolder' =>
		"Browse documents folder",

	/* 1.12 BUILD 06 */
	'lbl_image_platform' =>
		"Platform images",
	'lbl_image_platform_import_online' =>
		"Download platform images online from ICC (kameleon code needed)",
	'lbl_image_platform_import_local' =>
		"Import platform images from local folder (non ecc, like no-intro)",
	'lbl_image_platform_export_local' =>
		"Create platform imagepack (ecc, no-intro, emumovies)",

	/* 1.13 BUILD 02 */
	'lbl_emulator' =>
		"Platform emulators",
	'lbl_emulator_edc_download' =>
		"Download emulators from emuDownloadCenter (online)",
	'lbl_emulator_edc_webpage' =>
		"Open emuDownloadCenter project page",

	/* 1.13 BUILD 03 */
	'lbl_image_platform_import_emumovies' =>
		"Download platform images online from EmuMovies (forum account needed)",

	/* 1.13 BUILD 04 */
	'lbl_rom_content' =>
		"ROM Content/Media",
	'lbl_image_inject' =>
		"Download images online from ICC server (kameleon code needed)",
	'lbl_rom_video_add' =>
		"Add videofile",
	'lbl_rom_video_delete' =>
		"Delete videofile(s)",

	/* 1.14 BUILD 4 */
	'lbl_rom_moby_import_manual' =>
		"Import ROM information from MobyGames.com (manual)",
	'lbl_rom_moby_import_fullauto' =>
		"Import ROM information from MobyGames.com (full auto)",

	/* 1.152 BUILD 3 */
	'lbl_roms_clear_launchdata' =>
		"Clear ROM launch data",

	);
?>