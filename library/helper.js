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

$('.select-nama').select2();
$('.select-kelas').select2();