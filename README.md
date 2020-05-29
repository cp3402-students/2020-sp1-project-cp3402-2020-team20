# 2020-sp1-project-cp3402-2020-team20
2020-sp1-project-cp3402-2020-team20 created by GitHub Classroom

This is a Theme based on the Underscores starter theme template. Originally designed for a Jazz Club based in Townsville for the JCU subject CP3402. The Underscores base template used is the SCSS sass variation.
The deployment setup was Two live website hosting services, one for Testing and another for Production. This is not necessary for the Theme Developement however.
This repository is split into a Master Branch and a Developement Branch. All commits and pulled branches should be to and from the developement branch until a major commit is ready to be done from Developement to the Master Branch.
As SASS was used to generate the style.css file we needed a sass compiler, the compiler used is Gulp.

Requirements
--------------
<ul>
<li>WordPress Local Environment Install</li>
<li>Gulp</li>
<li>SASS editor (of your own choosing)</li>
</ul>

Getting Started
---------------
1. Setup Local WordPress Install
<ul>
<li>This can be any normal Wordpress packaged Install such as (Vagrant, Bitnami, XAMP)</li>
<li>Run the Wordpress Stack at least once to setup the admin password and confirm the install is working</li>
</ul>

2. Delete Themes folder 
<ul>
<li>In the Wordpress Install Directory search for the "themes" folder and delete it, it is usually located in "wp-content"</li>
</ul>

3. Perform Git Init and Pull a developement Branch into the "wp-content" directory so it replaces the themes folder where it was before it was deleted. The steps to do this are below:
<ul>
<li>Open a CMD prompt with the current directory set to "../wp-content"</li>
<li>Type "git init" to create an empty repository</li>
<li>Type "git remote add origin https://github.com/cp3402-students/2020-sp1-project-cp3402-2020-team20" to link the remote repository to this directory</li>
<li>On Github create a new Branch from the Developement Branch</li>
<li>Type "git fetch" to get a list of the available branches, the newly create branch should appear here</li>
<li>Type "git checkout -t *name of branch*" (the branches will look like "origin/name-of-branch")</li>
</ul>
The Theme files should now be downloaded from the remote repository onto the target local developement directory. Make sure to open the WordPress Admin panel and select "Group20" as the active theme.


4. Install Gulp, point to Wordpress Install
<ul>
<li>Install "Node.js" LTS version from https://gulpjs.com/docs/en/getting-started/quick-start/</li>
<li>Open CMD prompt with the current directory set to "../themes/group20/dev-gulp/" </li>
<li>Check the install worked with "node –version", "npm –version", and "npx –version"</li>
<li>Type "npm install --global gulp-cli" to install the Gulp client</li>
<li>Type "npm install" to install the required Gulp files in the current dev-gulp directory</li>
<li>Copy the local IP address of the local Wordpress install's site homepage</li>
<li>Open a file called Gulpfile.js in the ../themes/group20/dev-gulp/ folder and paste the IP address into "var server_location = 'http://127.0.0.1/wordpress/';"</li>
</ul>
A Gulp Client instance should now be installed in the ../themes/group20/dev-gulp/ folder.

Developing
---------------
1. Open WordPress with Gulp 
<ul>
<li>Make sure the Wordpress Stack is active by opening the local Wordpress site in the Browser</li>
<li>Open CMD prompt in the "../themes/group20/dev-gulp/" folder and type "gulp"</li>
</ul>
Gulp should start and the site should appear in a new browser tab. You can now edit the SASS files and PHP files, any changes to the theme files (PHP, SCSS) will automatically recompile and refresh in the browser.

2. Close Gulp when done
<ul>
<li>Hit ctrl+C to stop Gulp syncing with the browser in the CMD prompt gulp is running in</li>
<li>Exit CMD prompt</li>
</ul>
Commit/Push if needed.

Notes on Structure
---------------
<ul>
<li>All Customizer functions are in the functions.php file, for further documentation see <a href="https://developer.wordpress.org/reference/classes/wp_customize_manager/" target="_blank">WordPress Customize Manager</a></li>
  
</ul>

Plugins Used
---------------
<ul>
<li><a href="https://wordpress.org/plugins/responsive-slider-gallery/" target="_blank">Responsive Slider Gallery</a> - This plugin was used to create responsive galleries for photo posts. Each year has it's own post and gallery named accordingly, if adding a new year, a new post and gallery will need to be created. To create a new gallery click create new gallery and add the images for that gallery. To display the gallery on a page copy the link provided (looks like "[responsive-slider id=691]") and insert it into a HTML block where the gallery should be displayed. If editing an existing gallery select it from the plugin and add or remove images as desired and save changes.</li>
<li><a href="https://en-au.wordpress.org/plugins/all-in-one-wp-migration/" target="_blank">All-in-One WP Migration</a> - This plugin was used for ease of exporting and importing WordPress databases between developers local environments and test/production sites.</li>
<li><a href="https://help.servmask.com/knowledgebase/install-instructions-for-file-extension/" target="_blank">All-in-One WP Migration File Extension</a> - This plugin was used along side All-in-One WP Migration for larger files, as there is a limit on the size of the files.</li>
</ul>
