//====== membuat tombol kembali =======
function goBack() {
  window.history.back();
}
//====== END of membuat tombol kembali =

$('#data-table').DataTable({
  scrollX: true,
});
$('#data-table2').DataTable({
  scrollX: true,
});
$('#data-table3').DataTable({
  scrollX: true,
});
$('#data-table4').DataTable({
  scrollX: true,
  pageLength: 5,
});
$('#data-table5').DataTable({
  autoWidth: true,
  scrollX: true
});



$('#datepicker').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true
});
$('.datepicker').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true
});
$('#tanggalan').datepicker({
  format: 'yyyy-mm-dd',
  autoclose: true
});

$("#datepicker").datepicker($.datepicker.regional["id"]);
$(".datepicker").datepicker($.datepicker.regional["id"]);
$("#tanggalan").datepicker($.datepicker.regional["id"]);

$('.select-nama').select2();
$('.select-kelas').select2();