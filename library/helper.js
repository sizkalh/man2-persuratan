//====== membuat tombol kembali =======
function goBack() {
  window.history.back();
}
//====== END of membuat tombol kembali =

$('#data-table').DataTable();
$('#datepicker').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true
});
$('.datepicker').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true
});

$('.select-nama').select2();