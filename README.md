# Essay Helper - Web Design Final Project
# https://abeard1.w3.uvm.edu/cs008/FinalProject/form.php

EssayHelper is a tool to help fine-tune your essays. A little background on how it works:

When you submit your essay, EssayHelper splits it into two arrays: one split into individual sentences, and one split into individual words.

Example: If you submitted "Hello. This is a test essay.", EssayHelper would split this into:

Sentences Array:
0 -> hello
1 -> this is a test essay
Words Array:
0 -> hello
1 -> this
2 -> is
3 -> a
4 -> test
5 -> essay
EssayHelper than iterates through the sentences array, counting the number of words in each one, and flagging possible run-on or fragment sentences.

It then iterates through the words array, flagging words from the informalWords csv files.

After each iteration, the appropriate text is set as the tooltip text for that particular element.

