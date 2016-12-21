
    <div class="pageheader">
      <h2><i class="fa fa-calendar"></i> Calendar <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php?admin/member_information">DPC</a></li>
          <li><a href="#">Member Details</a></li>
          <li class="active">Calendar</li>
        </ol>
      </div>
    </div>
    
    <div class="contentpanel">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default panel-dark panel-alt">
            <div class="panel-heading">
              <h4 class="panel-title">Box Schedule</h4>
            </div>
            <div class="panel-body">
              <div id='external-events'>
                <?php foreach ($bschedule as $sval) { ?> 
                  <?php if($sval['member_id']==$this->uri->segment(3)):?>
                  <div class='external-event'><?php echo date('m-d-Y',  strtotime($sval['schedule_date']));?>&nbsp;&nbsp;<?php echo $sval['box_status'];?></div>
                <?php endif;}?>
              </div>
            </div>
          </div>
          <div class="panel panel-default panel-dark panel-alt">
            <div class="panel-heading">
              <h4 class="panel-title">Customers Events</h4>
            </div>
            <div class="panel-body">
              <div id='external-events'>
                <?php foreach ($events as $eval) { ?> 
                   <?php if($eval['member_id']==$this->uri->segment(3)):?>
                  <div class='external-event'><?php echo $eval['title'];?>&nbsp;&nbsp;<?php echo date('m-d-Y',  strtotime($eval['event_date']));?></div>
                <?php endif;}?>
              </div>
            </div>
          </div>
        </div><!-- col-md-3 -->
        
        <div class="col-md-9">
          <div id="calendar"></div>
        </div><!-- col-md-9 -->
      </div>
    </div>
 

<script>

  jQuery(document).ready(function() {
    
    "use strict";
	
	
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		jQuery('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			jQuery(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			jQuery(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		jQuery('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = jQuery(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				jQuery('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if (jQuery('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					jQuery(this).remove();
				}
				
			}
		});
        
		
	});

</script>