</div>
		<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqueryui-1.10.4/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqueryui-1.10.4/js/datepicker.js"></script>-->
		<script type="text/javascript">
			$(document).foundation();
		</script>
		<script type="text/javascript">
  function findValue(li) {
  	if( li == null ) return alert("No match!");

  	// if coming from an AJAX call, let's use the CityId as the value
  	if( !!li.extra ) var sValue = li.extra[0];

  	// otherwise, let's just display the value in the text box
  	else var sValue = li.selectValue;

  	//alert("The value you selected was: " + sValue);
  }

  function selectItem(li) {
    	findValue(li);
  }

  function formatItem(row) {
    	return row[0] + " (id: " + row[1] + ")";
  }

  function lookupAjax(){
  	var oSuggest = $("#CityAjax")[0].autocompleter;
    oSuggest.findValue();
  	return false;
  }

  function lookupLocal(){
    	var oSuggest = $("#CityLocal")[0].autocompleter;

    	oSuggest.findValue();

    	return false;
  }
  
  $("#CityAjax").autocompleteArray(["Allen","Albert","Alberto","Alladin"]);
    $("#CityAjax").autocomplete(
      "<?php echo 'http://localhost/sketchr/Sketchr/application/views/ajax.php';?>",
      {
  			delay:10,
  			minChars:2,
  			matchSubset:1,
  			matchContains:1,
  			cacheLength:10,
  			onItemSelect:selectItem,
  			onFindValue:findValue,
  			formatItem:formatItem,
  			autoFill:true
  		}
    );
  
</script>
	</body>
</html>
