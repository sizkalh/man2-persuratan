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

$('#tanggalan').datepicker({
  format: 'yyyy-mm-dd',
  autoclose: true
});

$('.select-nama').select2();
$('.select-kelas').select2();