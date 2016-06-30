$(document).ready(function(){
  var table = $('#example1').DataTable();
  
  $('#btn-export').on('click', function(){
      $('<table>').append(table.$('tr').clone()).table2excel({
          exclude: ".excludeThisClass",
          name: "Sheet 1",
          filename: "tes" //do not include extension
      });
  });      
})