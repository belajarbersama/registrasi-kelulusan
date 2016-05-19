$('#edit_jadwal').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var keterangan = button.data('keterangan');
	var mulai = button.data('mulai');
	var selesai = button.data('selesai');
	var nama_kegiatan = button.data('nama-kegiatan');
	var status = button.data('status');
	var modal = $(this);
	modal.find('.modal-title').text('Edit Jadwal');
	modal.find('#nama_kegiatan').val(nama_kegiatan);
	modal.find('#keterangan').val(keterangan);
	modal.find('#mulai').val(mulai);
	modal.find('#selesai').val(selesai);
	modal.find('#status').val(status);
	modal.find('#id_jadwal').val(id);
});


$('#modal_edit_jadwal').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var seleksi = button.data('seleksi');
	var sesi = button.data('sesi');
	var kelompok = button.data('kelompok');
	var tanggal = button.data('tanggal');
	var waktu_mulai = button.data('mulai');
	var waktu_selesai = button.data('selesai');
	var ruangan = button.data('ruangan');
	var modal = $(this);
	modal.find('.modal-title').text('Edit Jadwal');
	modal.find('#seleksi').val(seleksi);
	modal.find('#sesi').val(sesi);
	modal.find('#kelompok').val(kelompok);
	modal.find('#tanggal').val(tanggal);
	modal.find('#mulai').val(waktu_mulai);
	modal.find('#selesai').val(waktu_selesai);
	modal.find('#ruangan').val(ruangan);
	modal.find('#id_seleksi').val(id);
});

$('#input_nilai_ops').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var no_pendaftaran = button.data('no');
	var modal = $(this);
	modal.find('.modal-title').text('Input Nilai OPS');
	modal.find('#no_pendaftaran').val(no_pendaftaran);
});

$('#edit_nilai_ops').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var no_pendaftaran = button.data('no');
	var self_identity = button.data('self');
	var part_of_body = button.data('part');
	var observation = button.data('observation');
	var math_counting = button.data('math');
	var writing_reading = button.data('writing');
	var pengetahuan_agama = button.data('pengetahuan');
	var sikap = button.data('sikap');
	var keterangan = button.data('keterangan');
	var modal = $(this);
	modal.find('.modal-title').text('Edit Nilai OPS');
	modal.find('#no_pendaftaran').val(no_pendaftaran);
	modal.find('#self_identity').val(self_identity);
	modal.find('#part_of_body').val(part_of_body);
	modal.find('#observation').val(observation);
	modal.find('#math_counting').val(math_counting);
	modal.find('#writing_reading').val(writing_reading);
	modal.find('#pengetahuan_agama').val(pengetahuan_agama);
	modal.find('#sikap').val(sikap);
	modal.find('#keterangan').val(keterangan);
});

$('#input_nilai_ok').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var no_pendaftaran = button.data('no');
	var modal = $(this);
	modal.find('.modal-title').text('Input Nilai OK');
	modal.find('#no_pendaftaran').val(no_pendaftaran);
});

$('#edit_nilai_ok').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var no_pendaftaran = button.data('no');
	var koordinasi_keseimbangan = button.data('koordinasi');
	var sosial = button.data('sosial');
	var pengendalian_gerak = button.data('pengendalian');
	var modal = $(this);
	modal.find('.modal-title').text('Edit Nilai OK');
	modal.find('#no_pendaftaran').val(no_pendaftaran);
	modal.find('#koordinasi_keseimbangan').val(koordinasi_keseimbangan);
	modal.find('#sosial').val(sosial);
	modal.find('#pengendalian_gerak').val(pengendalian_gerak);
});

$('#edit_nilai_rekap').on('shown.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var no_pendaftaran = button.data('no');
	var ops = button.data('ops');
	var ok = button.data('ok');
	var status = button.data('status');
	var modal = $(this);
	modal.find('.modal-title').text('Edit Nilai Rekap');
	modal.find('#no_pendaftaran').val(no_pendaftaran);
	modal.find('#ops').val(ops);
	modal.find('#ok').val(ok);
	modal.find('#status').val(status);
});