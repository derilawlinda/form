	<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>-->
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
	
	<!--<script src="<?=base_url()?>js/scripts.js"></script>-->
	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
        
	<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
	-->


	<script src="<?=base_url()?>js/jquery-3.4.1.min.js"></script>
	<script src="<?=base_url()?>js/jquery331.js"></script>
	<script src="<?=base_url()?>js/jquery-ui.js"></script>
	<!--<script src="<?=base_url()?>js/jquery.dataTables.min.js"></script>-->
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569818907/jquery.table2excel.min.js"></script>
	<script type='text/javascript'>
	$(function() {
        $("#exporttable").click(function(e){
            var table = $("#dataTable");
            if(table && table.length){
                $(table).table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "LaporanSurvey" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: false
            });
        }
    });
    
    });
		$(document).ready(function(){
			var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
				$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
					if (this.href === path) {
						$(this).addClass("active");
					}
				});

			// Toggle the side navigation
			$("#sidebarToggle").on("click", function(e) {
				e.preventDefault();
				$("body").toggleClass("sb-sidenav-toggled");
			});
						
			$('#dataTable').DataTable( {
				"lengthMenu": [[5, 200, 500, -1], [5, 200, 500, "All"]],
				"order": [[ 0, "desc" ]]
			} );
		});
	</script>
	
	<script src="<?=base_url()?>js/bootstrap.bundle.min.js"></script>
  