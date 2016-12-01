<!--############# Main navigation ###########################-->
<nav>
    <ol>
        <?php
        // Repeat if block for each menu item 
        // gives current page a class / also expandable to more classes
        print '<li class=" ';
        if ($path_parts['filename'] == "index") {
            print ' activePage ';
        }
        print '">';
        print '<a href="index.php">Info</a>';
        print '</li>';
        /* repeating example */
        print '<li class="';
        if ($path_parts['filename'] == "form") {
            print ' activePage ';
        }
        print '">';
        print '<a href="form.php">EssayHelper</a>';
        print '</li>';
        ?>
    </ol>
</nav>

