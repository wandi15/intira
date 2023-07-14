/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.7.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.7/admin/
*/

var handleDataTableResponsive = function() {
	"use strict";
    
    if ($('#data-table').length !== 0) {
        $('#data-table').DataTable({
            responsive: true
        });
    }
    if ($('#data-table2').length !== 0) {
        $('#data-table2').DataTable({
            responsive: true
        });
    }
    if ($('#data-table3').length !== 0) {
        $('#data-table3').DataTable({
            responsive: true
        });
    }

    if ($('#data-table4').length !== 0) {
        $('#data-table4').DataTable({
            responsive: true
        });
    }

    if ($('#data-table5').length !== 0) {
        $('#data-table5').DataTable({
            responsive: true
        });
    }

    if ($('#data-table6').length !== 0) {
        $('#data-table6').DataTable({
            responsive: true
        });
    }

    if ($('#data-table7').length !== 0) {
        $('#data-table7').DataTable({
            responsive: true
        });
    }


};

var TableManageResponsive = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableResponsive();
        }
    };
}();