![gif](https://media.giphy.com/media/TJrS7r0f6SOthGTiPe/giphy.gif)

# Wunder Vanillist

Todolist website, works pretty good and looks amazing (yes it does).

# Installation

yeah, I will get back to you on this one, run some Artisan and/or Composer commands proparbly.

# Todo

-   [x] edit account email and password.
-   [x] upload a profile avatar image.
-   [ ] view all tasks.

# Code Review

Code review written by [Albin Andersson](https://github.com/itisalbin).

Task has no description. (And deadline is on lists and not the individual tasks.)

Routes in web.php only use 'post' and get, consider also using the verbs 'put', 'patch' and 'delete' where appropriate.

The welcome-page and list todos routes has some logic in them. You might want to put it in controllers instead.

Consider putting all routes that need authentication in a group:
Route::group(['middleware' => ['auth']], function () {//Your routes}
to not have to add it to the single routes.

Perhaps more of a preference, but consider merging controllers with common objects/topics into bigger ones, instead of using one per function. E.g. TaskController, TodoController.

due.blade.php has some commented out code that are not used.

# Testers

Tested by the following people:

1. Jane Doe
2. John Doe
