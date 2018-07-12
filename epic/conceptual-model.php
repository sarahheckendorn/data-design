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
					<li>songAuthor</li>
					<li>songDifficulty</li>
					<li>songTitle</li>
					<li>songTuning</li>
				</ul>
			<h3>SongTab</h3>
				<ul>
					<li>songTabId(primary key)</li>
					<li>songTabLocation(foreign key)</li>
				</ul>
			<h3>Tab</h3>
				<ul>
					<li>tabSongId(primary key)</li>
					<li>tabImage</li>
					<li>tabKey</li>
				</ul>
			<h2>Relationships</h2>
		<ul>
			<li>A song can have multiple tabs (1 to many)</li>
			<li>Multiple tabs can be in multiple songs (many to many)</li>
		</ul>
		</div>
	</body>
</html>

