  </div>
  <script src="<?php echo URLROOT; ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
  	function computePath(target){
	  let els = []
	  let a = target;
	  while (a) {
	      els.unshift(a);
	      a = a.parentNode;
	  }
	  els.reverse();
	  els.pop();
	  els.pop();
	  els.pop();
	  return els;
	}


    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });


	$('li[data-choose-language]').click(function(e) {
		$lang_id = $(this).attr('data-choose-language');

		$('[data-language]').removeClass('active');
		$('[data-choose-language]').removeClass('active');

		$('[data-language="' + $lang_id + '"]').addClass('active');
		$('[data-choose-language="' + $lang_id + '"]').addClass('active');
	})





  </script>
</body>
</html>
