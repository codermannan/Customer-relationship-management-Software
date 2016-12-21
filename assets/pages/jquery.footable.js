/**
* Theme: Ubold Dashboard
* Author: Coderthemes
* Foo table
*/

$(window).on('load', function() {

	// Row Toggler
	// -----------------------------------------------------------------
	$('#demo-foo-row-toggler').footable();

	// Accordion
	// -----------------------------------------------------------------
	$('#demo-foo-accordion').footable().on('footable_row_expanded', function(e) {
		$('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
			$('#demo-foo-accordion').data('footable').toggleDetail(this);
		});
	});

	// Pagination
	// -----------------------------------------------------------------
	$('#demo-foo-pagination').footable();
	$('#demo-show-entries').change(function (e) {
		e.preventDefault();
		var pageSize = $(this).val();
		$('#demo-foo-pagination').data('page-size', pageSize);
		$('#demo-foo-pagination').trigger('footable_initialized');
	});

	// Filtering
	// -----------------------------------------------------------------
	var filtering = $('#demo-foo-filtering');
	filtering.footable().on('footable_filtering', function (e) {
		var selected = $('#demo-foo-filter-status').find(':selected').val();
		e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
		e.clear = !e.filter;
	});

	// Filter status
	$('#demo-foo-filter-status').change(function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {filter: $(this).val()});
	});

	// Search input
	$('#demo-foo-search').on('input', function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {filter: $(this).val()});
	});


	// Add & Remove Row
	// -----------------------------------------------------------------
	var addrow = $('#demo-foo-addrow');
	addrow.footable().on('click', '.demo-delete-row', function() {

		//get the footable object
		var footable = addrow.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});

	// Search input
	$('#demo-input-search2').on('input', function (e) {
		e.preventDefault();
		addrow.trigger('footable_filter', {filter: $(this).val()});
	});
        
	// Add Row Button
        var a = 1;
	$('#demo-btn-addrow').click(function() {
                a++;
		//get the footable object
		var footable = addrow.data('footable');

		//build up the row we are wanting to add
		var newRow = '<tr id="id'+a+'"><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="exp_type[]" data-parsley-id="28"><option value="">Please Select</option><option value="1">Transport</option><option value="2">Misc</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter From" class="form-control" id="dstFrom" name="dst_from[]"></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter To" class="form-control" id="dstFrom" name="dst_to[]"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="trans_mode"><option value="">Please Select</option><option value="1">Bike</option><option value="2">Bus</option><option value="3">Train</option><option value="4">Ferry</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" id="datepicker3" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="from_date"></td><td class="footable-visible" style="width: 121px;"><input type="text" id="datepicker4" placeholder="mm/dd/yyyy" class="form-control datepickerTo" name="to_date"></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Purpose" class="form-control" id="Purpose" name="purpose"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="currency"><option value="">Please Select</option><option value="1">AUD</option><option value="2">BRL</option><option value="3">CAD</option><option value="4">CZK</option><option value="5">DKK</option><option value="6">EUR</option><option value="7">HKD</option><option value="8">HUF</option><option value="9">ILS</option><option value="10">JPY</option><option value="11">MYR</option><option value="12">MXN</option><option value="13">NOK</option><option value="14">NZD</option><option value="15">PHP</option><option value="16">PLN</option><option value="17">GBP</option><option value="18">SGD</option><option value="19">SEK</option><option value="20">CHF</option><option value="21">TWD</option><option value="22">THB</option><option value="23">TRY</option><option value="24">USD</option><option value="25">BDT</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter To" class="form-control" id="dstTo" name="dst_to"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="mode" data-parsley-id="28"><option value="">Please Select</option><option value="1">Yes</option><option value="0">No</option></select></td><td style="text-align: center;"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td></tr>';
		//add it
		footable.appendRow(newRow);
               
//                $( ".datepickerFrom, .datepickerTo").datepicker({
//                    changeMonth: true,//this option for allowing user to select month
//                    changeYear: true,
//                    dateFormat: 'dd-mm-yy'//this option for allowing user to select from year range
//                 });
              
//                $('.datepickerFrom,.datepickerTo').datepicker();
//                $('#datepicker-autoclose').datepicker({
//                	autoclose: true,
//                	todayHighlight: true
//                });
	});
});
