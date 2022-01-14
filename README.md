![gif](https://media.giphy.com/media/TJrS7r0f6SOthGTiPe/giphy.gif)

# Wunder Vanillist

Todolist website, works pretty good and looks amazing (yes it does).
[Test it here, but don't use your goto password.](https://wunder-vanillist.neo.fyi)
Also my npm doesnt work so no tailwind unfortunatly :(

# Installation

1. open terminal.
2. `cd` to where you want it.
3. `git clone https://github.com/neoisrecursive/wunder-vanillist`.
4. `cd wunder-vanillist`.
5. `./install`
6. that should install and fix everything for you so its only to run `php artisan serve`.

# Todo

-   [x] edit account email and password.
-   [x] upload a profile avatar image.
-   [x] view all tasks.
-   [ ] Delete account.
-   [ ] description on tasks or todos.
-   [ ] delete todos.
-   [ ] forgot password.

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

1. Albin Andersson
2. Theo Sandell
