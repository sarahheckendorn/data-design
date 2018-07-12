<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF8">
		<title>Data Design</title>
	</head>
	<body>
		<h1>Conceptual Model</h1>
		<h2>Entities & Attributes</h2>
		<div>
			<h3>Song</h3>
				<ul>
					<li>songId(primary key)</li>
					<li>songArtistId(foreign key)</li>
					<li>songTitle</li>
					<li>songDifficulty</li>
					<li>songTuning</li>
					<li>songAuthor</li>
				</ul>
			<h3>SongTab</h3>
				<ul>
					<li>songTabId(foreign key)</li>
					<li>songTabOrder</li>
				</ul>
			<h3>Tab</h3>
				<ul>
					<li>tabSongId(primary key)</li>
					<li>tabKey(foreign key)</li>
					<li>tabImage</li>
				</ul>
			<h2>Relationships</h2>
		<ul>
			<li>A song can have multiple tabs (1 to many)</li>
			<li>Multiple tabs can be in multiple songs (many to many)</li>
		</ul>
		</div>
	</body>
</html>

