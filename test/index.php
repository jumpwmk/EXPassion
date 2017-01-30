
<!doctype html>
<html>
  <head> 
    <title>Upload Page</title>
  </head>

  <body>

    <h1>Upload Problem</h1>
    <p>Select subject</p>
    <select>
      <option value="phy">Physics</option>
      <option value="th">Thai</option>
      <option value="math">Math</option>
      <option value="social">Social</option>
    </select>

    <form action="http://www.google.com">
      Select a file (ZIP): <input type="file" name="prob">
      <input type="submit">
    </form>
	<p>test P before</p>
	<?php
	$name = 'nueng';
	echo  $name;

	?>
	<p>test P after</p>
  </body>
</html>
