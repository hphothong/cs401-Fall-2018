<div class="navbar">
    <?php
	    $navigationPages = Array(
		    "Home" => "index.php",
			"Recent Reviews" => "recent_reviews.php",
			"Top Ratings" => "top_ratings.php",
			"Top Businesses" => "top_businesses.php",
			"Top Locations" => "top_locations.php",
            "Write Review" => "create_review.php"
		);
		$currentPageName = getCurrentPageName($navigationPages);
		foreach ($navigationPages as $linkName => $linkFilename)
		{
			if ($linkFilename === $currentPageName)
			{
                echo "<a id='current_page' class='navbar_item' href='{$linkFilename}'><div><div class='navbar_notifier'><div id='current_notifier'></div></div><span class='navbar_item_label'>{$linkName}</span></div></a>";
		    }
			else
			{
				echo "<a class='navbar_item' href='{$linkFilename}'><div><div class='navbar_notifier'></div><span class='navbar_item_label'>{$linkName}</span></div></a>";
			}
		}
	?>
</div>
		
