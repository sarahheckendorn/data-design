-- INSERT STATEMENTS

INSERT INTO song(songId, songAuthor, songDifficulty, songKey, songTitle, songTuning) VALUES(UNHEX("17a488176b504ec78a2fef7284fb6f3f"), "John Legend", "Novice", "Em", "All of Me", "E A D B G E");

UPDATE song SET songAuthor = "Johnny Legend" WHERE songId = UNHEX("17a488176b504ec78a2fef7284fb6f3f");

DELETE FROM song WHERE songId = UNHEX("17a488176b504ec78a2fef7284fb6f3f");

SELECT songAuthor, songTab FROM song WHERE songAuthor "Elvis Presely";

-- write joint statement

INSERT INTO tab(tabId, tabImageUrl) VALUES (UNHEX("7235ca2046aa489a9e697636b35821b8"), "https://tabs.ultimate-guitar.com/tab/elvis_presley/cant_help_falling_in_love_chords_1086983");

INSERT INTO tab(tabId, tabImageUrl) VALUES (UNHEX("8ec23d5f37cd49d0b59565c5b4cac175"), "https://tabs.ultimate-guitar.com/tab/jeff_buckley/hallelujah_chords_198052");

INSERT INTO song(songId, songAuthor, songDifficulty, songKey, songTitle, songTuning) VALUES (UNHEX("b17bc90326e344809af442f7ff34407b"), "Ed Sheern", "Novice", "Ab", "Perfect", "E A D G B E");

INSERT INTO song(songId, songAuthor, songDifficulty, songKey, songTitle, songTuning) VALUES (UNHEX("7fac7ddea4b7499ab9911a6b9b510622"), "Passenger", "Novice", "Am", "Let Her Go", "E A D G B E");

UPDATE song SET songAuthor = "Ed Sheeran" WHERE songId = UNHEX("b17bc90326e344809af442f7ff34407b");

DELETE FROM song WHERE songId = UNHEX("7fac7ddea4b7499ab9911a6b9b510622");