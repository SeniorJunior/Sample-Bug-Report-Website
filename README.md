# SampleBugReportWebsite
This is a sample bug report website

### Background
----
This is a project that is created to showcase the usage of Object Oriented in PHP [My First time trying PHP :)]   
The project name is called Minion.

Front end : HTML5, CSS, Javascript
Backend : PHP, MYSQL

### Details
----
The goal is that the users can report bugs, triage bugs, and manage a bug’s lifecycle (see https://bugzilla.mozilla.org/show_bug.cgi?id=1429672  for an example). 
This system has different user types: bug reporters, triagers, developers, and reviewers.  Reporters here can be end-users, testers, and any other users. Developers are those assigned to fix a bug, and hence their expertise and experience (e.g. the bugs that have been fixed by them) are important. Reviewers check if a bug has been fixed with the patches provided by the developer and close it accordingly. Triager is responsible for managing all quality aspects of a bug, such as assigning it to a suitable developer, checking if it is a duplicate or invalid bug.  All of these must be kept and managed by the system. 
Throughout the lifecycle of a bug, users can participate in discussing how to fix it (by providing comments). User can also search for bugs through keywords, titles, assignee, etc. The system can also generate various reports such as the number of bugs reported in a month and the best performed developers in the month.

### Class diagram
----
Filename : minion_classDiagram_1 and minion_classDiagram_2

### Folders
----
CODES : 
- images (Store all the neccessary css images)
- nbproject
- vendor (for javascript)
- boundary (Code for boundary classes)
- controller (Code for controller classes)
- entity (Code for entity class)







