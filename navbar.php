<div class="navbar">
    <?php
	    $navigationPages = Array(
		    "Home" => "index.php",
			"Recent Reviews" => "recent_reviews.php",
			"Top Ratings" => "top_ratings.php",
			"Top Businesses" => "top_businesses.php",
			"Top Locations" => "top_locations.php"
		);
		$currentPageName = getCurrentPageName($navigationPages);
		foreach ($navigationPages as $linkName => $linkFilename)
		{
			if ($linkFilename === $currentPageName)
			{
				echo "<a id=\"currentPage\" href=\"{$linkFilename}\">{$linkName}</a>";
			}
			else
			{
				echo "<a href=\"{$linkFilename}\">{$linkName}</a>";
			}
		}
	?>
</div>
		
