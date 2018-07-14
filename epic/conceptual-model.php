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
					<li>songKey</li>
					<li>songTitle</li>
					<li>songTuning</li>
				</ul>
			<h3>SongTab</h3>
				<ul>
					<li>songTabSongId(foreign key)</li>
					<li>songTabTabId(foreign key)</li>
				</ul>
			<h3>Tab</h3>
				<ul>
					<li>tabId(primary key)</li>
					<li>tabImageUrl</li>
				</ul>
			<h2>Relationships</h2>
		<ul>
			<li>A song can have multiple tabs (1 to many)</li>
			<li>Multiple tabs can be in multiple songs (many to many)</li>
		</ul>
		</div>
		<div>
			<img src="image/Erd.svg" alt="ERD.svg image">
		</div>
	</body>
</html>

