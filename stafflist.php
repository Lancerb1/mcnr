<?php

$staff_no_pic = "staff_no_image.jpg";

/* Past staff
[632, "saz", "ee", "May 2020", "mlgerror2.png"]
*/

$json_data = <<<_END
[
	{
		"name": "Community Manager",
		"id": -1,
		"color": "green",
		"size": 16,
		"members": [
			[99, "Trina", "us", "January 2020", "trina.png"]
		]
	},
	{
		"name": "Managers",
		"id": -1,
		"color": "green",
		"size": 16,
		"members": [
			[290, "Lancerb1", "us", "February 2020", "lancer.png"],
			[476, "Cashewz", "bh", "February 2020", "cashewz2.png"],
			[1174, "Domingo", "hr", "September 2020", "domingo.jpg"],
			[1847, "MajesticFudgie", "gb", "Steptember 2020", "majesticfudgie.png"]
		]
	},
	{
		"name": "Administrators",
		"id": 2,
		"color": "purple",
		"size": 16,
		"members": [
			[415, "Venom.", "pk", "February 2020", "venom2.png"],
			[532, "ranja", "pt", "August 2020", "ranja.png"],
			[2064, "Wilderhammer", "de", "December 2020", "thetrevorp.png"],
			[1673, "Karbz", "au", "January 2021", "karbz2.png"],
			[17, "GtaFreak", "au", "January 2021", "staff_madddogg.png"],
			[595, "Sousage", "id", "March 2021", "staff_sousage.png"],
			[917, "Charlie", "hr", "March 2021", "charlie.png"],
			[778, "Dudesdog", "us", "March 2021", "dudesdog3.png"],
			[911, "TheDan", "eg", "February 2021", "dan.png"],
			[801, "Pogger", "in", "April 2021", "dpit2.png"]
		]
	},
	{
		"name": "Moderators",
		"id": 11,
		"color": "orange",
		"size": 16,
		"members": [
			[1957, "ViperRadius", "ph", "December 2020", "viperradius.png"],
			[645, "cynosy", "ee", "January 2021", "cynosy.jpg"],
			[21, "YellowFlash", "au", "February 2021", "yellowflash.png"],
			[656, "Bahzi", "nl", "April 2021", "bahzi.png"],
			[2491, "Stylebender", "ee", "April 2021", "styleblender.png"],
			[284, "[RA]Alex184", "us", "May 2021", "alex184.png"],
			[2449, "Faksy", "si", "April 2021", "faksy.png"]
		]
	},
	{
		"name": "Testers",
		"id": 9,
		"color": "blue",
		"size": 16,
		"members": [
			[2577, "Kreenzee", "us", "April 2021", "kareenzee.png"],
			[482, "Parzival", "pk", "May 2021", "parzival.png"],
			[2070, "[RA]Eddz", "fr", "June 2021", "{$staff_no_pic}"]
		]
	}
]
_END;

header('Content-type: text/plain');

$str_template = array(
	'header1' => '[b][size=%spt][color=%c]%t[/color][/size][/b]',
	'header2' => '[b][size=%spt][color=%c][url=https://mikescnr.com/forum/index.php?action=groups;sa=members;group=%id]%t[/url][/color][/size][/b]',
	'cell' => '[td][center][b]
[url=https://mikescnr.com/forum/index.php?action=profile;u=%id]%name[/url][/b] [img]https://mikescnr.com/forum/Themes/default/images/flags/%flag.png[/img]
[url=https://mikescnr.com/forum/index.php?action=profile;u=%id][img]https://mikescnr.com/images/staff/%image[/img][/url]
          Joined the team          
%join
[/center][/td]'
);
?>
[center][img]https://www.mikescnr.com/images/titlelogobig.png[/img]
[color=teal][size=16pt][b]Staff list and credits[/b][/size][/color]

Running MCNR is not an easy task, and we have a solid team of management, admins, moderators and testers that help keep MCNR running smoothly. From day-to-day server/forum administration to long-term management planning, we have to be thankful for the efforts of these people. Thanks guys![/center]

[center]

[b][size=16pt][color=red][url=https://mikescnr.com/forum/index.php?action=groups;sa=members;group=1]Developers[/url][/color][/size][/b]

[table]
[tr]
[td][center]
[b][url=https://mikescnr.com/forum/index.php?action=profile;u=1]Mike[/url][/b] [img]https://mikescnr.com/forum/Themes/default/images/flags/gb.png[/img]
Owner
[url=https://mikescnr.com/forum/index.php?action=profile;u=1][img]https://mikescnr.com/images/staff/mike.jpg[/img][/url]
          Sole developer          
Since 2012
[/center][/td]
[/tr]
[/table]

[hr]

<?php

$staff_list = json_decode($json_data);
foreach($staff_list as $index => $section){
	// Create Header
	if($section->id == -1){ 
		echo str_replace(
			array('%s', '%c', '%t'), 
			array($section->size, $section->color, $section->name), 
			$str_template['header1']) . "\n";
	} else {
		echo str_replace(
			array('%s', '%c', '%id', '%t'), 
			array($section->size, $section->color, $section->id, $section->name), 
			$str_template['header2']) . "\n";
	}
	
	// Create member list
	$count = 0;
	echo "[table][tr]\n";
	foreach($section->members as $member){
		echo str_replace(
			array('%id', '%name', '%flag', '%join', '%image'), 
			$member, $str_template['cell']
		) . "\n";
		
		if(++$count == 3){
			$count = 0;
			echo "[/tr][/table]\n[table][tr]\n";
		}
	}
	echo "[/tr][/table]\n";
	
	if($index < count($staff_list) -1) echo "\n[hr]\n\n";
}

?>
[hr]

[i]Last updated: 22/04/2021 by [member=632]saz[/member]
Check out [b]Staff of the Month[/b] [url=https://mikescnr.com/forum/index.php/topic,488.msg1697.html#msg1697]here[/url].

[b][size=14pt][color=green]We're hiring![/color][/size][/b]
[url=https://mikescnr.com/admin][img]https://mikescnr.com/blog/wp-content/uploads/2019/08/APPLY.png[/img][/url]
Click above to apply.

[hr]

[img]https://www.mikescnr.com/images/titlelogobig.png[/img]
[color=teal][size=16pt][b]Credits[/b][/size][/color]

[b]Server hosting[/b]
TommyB/fr0st

[b][size=14pt]Scripts[/size][/b]
[b]Y_Less[/b]: YSI,  sscanf,  foreach,  fixes.inc etc.
[b]Incognito[/b]: Streamer and audio plugin
[b]BlueG and maddinat0r[/b]: mySQL plugin
[b]Gamer_Z[/b]: GPS plugin
[b]Slice[/b]: Various libraries and snippets
[b]MajesticFudgie[/b]: Various help, ideas, tools and inspiration
[b]Kalcor and SA-MP team[/b]: MapAndreas plugin and of course SA-MP itself
Special thanks to [b]SA-MP forum community[/b] and [b]wiki contributors[/b]. These resources are invaluable!

[b][size=14pt]Testing and support[/size][/b]
Ted, Vetle, Y_Less, blewert, kc_

[hr]

Thank you to all of our staff, past and present, that help keep the server running, find bugs and test new features.

[/center]
