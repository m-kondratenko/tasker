# tasker
The task is to create task manager.

The task consists of:
- user name;
- е-mail;
- task itself;
- picture.

Requirements for pictures - JPG/GIF/PNG format, not more than 320х240 pixels.
Trying to upload lager picture will result decreasing of its dimensions proportionally.

Any user can create new task.
Before saving there can be possible to click "preview" button, it should work without page reloading.

There should be administrator logon (login "admin", password "123").
Administrator can edit text of tasks and change its status to "done".
Such tasks has special mark of their status.

There should be possible to sort list of tasks by user name, e-mail and status.


Notes

This application uses the following technologies:

- HTML, CSS for main blocks and styling;
- javaScript for client logic;
- Ajax for communicating with server without reloading of the page;
- PHP for main server logic;
- Required PHP 5.6.

Main page is a list of tasks. Here you can sort this list by clicking on the following fields: №, username, email, status.

Also you may logon as administrator. After that you will be able to edit tasks by clicking on the task string (any field). You may change the task itself and its status (only 0 and 1 are allowed).

By clicking on "New task" button you will see a form where you can create new task. You should fill all fields and click "Send" button. You may aslo click "Preview" button to see all fields and the picture.
