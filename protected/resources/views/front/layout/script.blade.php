{!! Html::script('assets/front/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
<script>
	function scrollValidation() {
		if($(window).scrollTop() > 500){
			$("#fcs-navbar").addClass('full-color');
		} else {
			$("#fcs-navbar").removeClass('full-color');
		}
	}
	$(document).scroll(function() {
		scrollValidation();
	});
	$(function () {
		$('.nav-tabs').responsiveTabs();
		scrollValidation();
        var title = '';
        var type = '';
        var message = '';
        if(title && type && message) {
            swal({
                title: title,
                type: type,
                text: message,
                timer: 10000,
                showConfirmButton: true
            });
        }

        $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
		    event.preventDefault();
		    event.stopPropagation();
		    //method 1: remove show from sibilings and their children under your first parent
			/*if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
			}  */     
		    //method 2: remove show from all siblings of all your parents
		    $(this).parents('.dropdown-submenu').siblings().find('.show').removeClass("show");
		    $(this).siblings().toggleClass("show");
		    //collapse all after nav is closed
		    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		      $('.dropdown-submenu .show').removeClass("show");
		    });
		});
	});
</script>