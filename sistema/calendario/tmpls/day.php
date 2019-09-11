<?php
date_default_timezone_set("America/Mexico_City");
$hora = date('h:i',time() - 3600*date('I')); 

?>
<div id="cal-day-box">
	<div class="row-fluid cal-row-head">
		<div class="span1 col-xs-1 cal-cell"><%= cal.locale.time %></div>
		<div class="span11 col-xs-11 cal-cell"><%= cal.locale.events %></div>
	</div>
	<% if(all_day.length) {%>
		<div class="row-fluid clearfix cal-day-hour">
			<div class="span1 col-xs-1"><b><%= cal.locale.all_day %></b></div>
			<div class="span11 col-xs-11">
				<% _.each(all_day, function(event){ %>
					<div class="day-highlight dh-event-success">
						<%= event.title %>
					</div>
				<% }); %>
			</div>
		</div>
	<% }; %>
	<% if(before_time.length) {%>
		<div class="row-fluid clearfix cal-day-hour">
			<div class="span1 col-xs-3"><b><%= cal.locale.before_time %></b></div>
			<div class="span5 col-xs-5">
				<% _.each(before_time, function(event){ %>
					<div class="day-highlight dh-event-warning">
						<span class="cal-hours pull-right"><%= event.end_hour %></span>
						<%= event.title %>
					</div>
				<% }); %>
			</div>
		</div>
	<% }; %>
	<div id="cal-day-panel" class="clearfix">
		<% _.each(by_hour, function(event){ %>
			<div class="pull-left day-event day-highlight dh-event-success" style="margin-top: <%= (event.top * 30) %>px; height: <%= (event.lines * 30) %>px">
				<span class="cal-hours"><%= event.start_hour %> - <%= event.end_hour %></span>
				<%= event.title %>
			</div>
		<% }); %>

		<div id="cal-day-panel-hour">
			<% for(i = 6; i < hours; i++){ %>
				<div class="cal-day-hour">
					<% for(l = 0; l < in_hour; l++){ %>
						<div class="row-fluid cal-day-hour-part">
							<div class="span1 col-xs-1"><b><%= cal._hour(i, l) %></b></div>
							<div class="span11 col-xs-11"></div>
						</div>
				<% }; %>
				</div>
			<% }; %>
		</div>
	</div>
	<% if(after_time.length) {%>
	<div class="row-fluid clearfix cal-day-hour">
		<div class="span1 col-xs-3"><b><%= cal.locale.after_time %></b></div>
		<div class="span11 col-xs-9">
			<% _.each(after_time, function(event){ %>
			<div class="day-highlight dh-event-warning">
				<span class="cal-hours"><%= event.start_hour %></span>
				<%= event.title %>
			</div>
			<% }); %>
		</div>
	</div>
	<% }; %>
</div>