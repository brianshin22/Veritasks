/* Formating function for row details */
function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Additional Information:</td><td>'+aData[5]+'</td></tr>';
    sOut += '<tr><td>Number of Completions:</td><td>'+aData[6]+' out of '+ aData[7] + '</td></tr>';
    sOut += '</table>';
     
    return sOut;
}
 
$(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="img/details_open.png" width=20>';
    nCloneTd.className = "center";
     
    $('#tasktable thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );
     
    $('#tasktable tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );
     
    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#tasktable').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] },
            { "bSearchable": false, "aTargets": [ 5,6,7 ]},
            { "bVisible": false, "aTargets": [ 5,6,7 ]}
        ],
        "aaSorting": [[1, 'asc']],
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page" }
    });
     
    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */ 
    $('#tasktable tbody td').live('click', function () {
        var nTr = $(this).children("img").parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            $(this).children("img").attr("src", "img/details_open.png");
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            $(this).children("img").attr("src","img/details_close.png");
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );
