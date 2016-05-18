
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* bootstrap tables
*/



$(document).ready(function() {


	// BOOTSTRAP TABLE - CUSTOM TOOLBAR
	// =================================================================
	// Require Bootstrap Table
	// http://bootstrap-table.wenzhixin.net.cn/
	// =================================================================
	var $table = $('#demo-custom-toolbar'),	$remove = $('#demo-delete-row');

	$table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
		$remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
	});

	$remove.click(function () {
		var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
			return row.id
		});
		$table.bootstrapTable('remove', {
			field: 'id',
			values: ids
		});
		$remove.prop('disabled', true);
	});


});

// FORMAT COLUMN
// Use "data-formatter" on HTML to format the display of bootstrap table column.
// =================================================================


// Sample format for Invoice Column.
// =================================================================
function invoiceFormatter(value, row) {
	return '<a href="#" class="btn-link" > Order #' + value + '</a>';
}

// Sample Format for User Name Column.
// =================================================================
function nameFormatter(value, row) {
	return '<a href="#" class="btn-link" > ' + value + '</a>';
}

// Sample Format for Order Date Column.
// =================================================================
function dateFormatter(value, row) {
	var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
	return '<span class="text-muted"> ' + value + '</span>';
}

// Sample Format for Order Date Column.
// =================================================================
function timeFormatter(value, row) {
	var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
	return '<span class="text-muted"> ' + value + ' WIB</span>';
}

// Sample Format for Order Status Column.
// =================================================================
function statusFormatter(value, row) {
	var labelColor;
	if (value == "Sudah") {
		labelColor = "success";
	}else if(value == "Belum"){
		labelColor = "warning";
	}
	var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
	return '<div class="label label-table label-'+ labelColor+'"> ' + value + '</div>';
}

// Sample Format for Order Status Column.
// =================================================================
function statusterlaksana(value, row) {
	var labelColor;
	if (value == "Belum") {
		labelColor = "warning";
	}else if(value == "Terlaksana"){
		labelColor = "success";
	}else if (value == "Berlangsung") {
		labelColor ="purple";
	}
	var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
	return '<div class="label label-table label-'+ labelColor+'"> ' + value + '</div>';
}

// Sample Format for Order Status Column.
// =================================================================
function roomFormatter(value, row) {
	var labelColor;
	if (value == "Joy") {
		labelColor = "primary";
	} else if (value == "Love"){
		labelColor = "pink";
	} else if (value == 'Peace'){
		labelColor = 'purple';
	} else if (value == "Aula") {
		labelColor = 'inverse';
	}
	var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
	return '<span class="label label-'+labelColor+'">'+value+'</span>';
}


// Sort Price Column
// =================================================================
function priceSorter(a, b) {
	a = +a.substring(1); // remove $
	b = +b.substring(1);
	if (a > b) return 1;
	if (a < b) return -1;
	return 0;
}

