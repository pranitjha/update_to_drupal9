# update_to_drupal9
###Services and Dependency Injection.
First commit has deprecated code, and in the second commit deprecated code is removed.
coomit details: https://github.com/pranitjha/update_to_drupal9/commit/d14d0a92710aac442ee13c9dff246d10e0c46caf
after second commit drupal-check is working fine and no error is reported, earlier drupal-check was reporting 2 errors.

In the 3rd commit we will show how to use dependency injection.
Commit: https://github.com/pranitjha/update_to_drupal9/commit/272194ab43700f51b74a10ef0d42b83df7a37063

###Block System.
Custom block creation related code doesn't have any deprecations, which means same code can be used for Drupal 8 and Drupal 9.
Only thing is you you are using any deprecated function in you block generation logic then you need to fix that to make it D9 compatible.
