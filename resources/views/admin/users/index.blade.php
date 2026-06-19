@extends('layouts.admin')
@section('title', 'Data Users')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Data Users</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        + Tambah User
    </button>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table id="userTable" class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1a1a2e; color: white;">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="alertTambah"></div>
                <form id="formTambah">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" id="tambahNama" class="form-control" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" id="tambahEmail" class="form-control" placeholder="Masukkan email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">No HP</label>
                        <input type="text" id="tambahNoHp" class="form-control" placeholder="Masukkan no HP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat</label>
                        <textarea id="tambahAlamat" class="form-control" rows="3" placeholder="Masukkan alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role/Jabatan</label>
                        <select id="tambahRole" class="form-select">
                            <option value="">Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Staff">Staff</option>
                            <option value="Developer">Developer</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f5c518; color: #1a1a2e;">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="alertEdit"></div>
                <form id="formEdit">
                    <input type="hidden" id="editId">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" id="editNama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" id="editEmail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">No HP</label>
                        <input type="text" id="editNoHp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat</label>
                        <textarea id="editAlamat" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role/Jabatan</label>
                        <select id="editRole" class="form-select">
                            <option value="">Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Staff">Staff</option>
                            <option value="Developer">Developer</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-warning" id="btnUpdate">Update</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Load data users dengan AJAX GET
    function loadUsers() {
        $.ajax({
            url: '/api/v1/users',
            method: 'GET',
            success: function(response) {
                let tbody = '';
                $.each(response.data, function(index, user) {
                    tbody += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${user.nama}</td>
                            <td>${user.email}</td>
                            <td>${user.no_hp}</td>
                            <td>${user.alamat}</td>
                            <td><span class="badge bg-dark">${user.role}</span></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editUser(${user.id})">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Hapus</button>
                            </td>
                        </tr>
                    `;
                });
                $('#tableBody').html(tbody);

                if ($.fn.DataTable.isDataTable('#userTable')) {
                    $('#userTable').DataTable().destroy();
                }
                $('#userTable').DataTable({
                    pageLength: 10,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        }
                    }
                });
            },
            error: function() {
                $('#tableBody').html('<tr><td colspan="7" class="text-center text-muted">Gagal memuat data</td></tr>');
            }
        });
    }

    // Tambah user dengan AJAX POST
    $('#btnSimpan').click(function() {
        let data = {
            nama: $('#tambahNama').val(),
            email: $('#tambahEmail').val(),
            no_hp: $('#tambahNoHp').val(),
            alamat: $('#tambahAlamat').val(),
            role: $('#tambahRole').val(),
        };

        $.ajax({
            url: '/api/v1/users',
            method: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#modalTambah').modal('hide');
                $('#formTambah')[0].reset();
                $('#alertTambah').html('');
                loadUsers();
                alert('User berhasil ditambahkan!');
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let msg = '<div class="alert alert-danger">';
                $.each(errors, function(key, val) {
                    msg += '<p class="mb-0">' + val[0] + '</p>';
                });
                msg += '</div>';
                $('#alertTambah').html(msg);
            }
        });
    });

    // Edit user - load data
    function editUser(id) {
        $.ajax({
            url: '/api/v1/users/' + id,
            method: 'GET',
            success: function(response) {
                let user = response.data;
                $('#editId').val(user.id);
                $('#editNama').val(user.nama);
                $('#editEmail').val(user.email);
                $('#editNoHp').val(user.no_hp);
                $('#editAlamat').val(user.alamat);
                $('#editRole').val(user.role);
                $('#modalEdit').modal('show');
            }
        });
    }

    // Update user dengan AJAX PUT
    $('#btnUpdate').click(function() {
        let id = $('#editId').val();
        let data = {
            nama: $('#editNama').val(),
            email: $('#editEmail').val(),
            no_hp: $('#editNoHp').val(),
            alamat: $('#editAlamat').val(),
            role: $('#editRole').val(),
        };

        $.ajax({
            url: '/api/v1/users/' + id,
            method: 'PUT',
            data: JSON.stringify(data),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#modalEdit').modal('hide');
                $('#alertEdit').html('');
                loadUsers();
                alert('User berhasil diupdate!');
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let msg = '<div class="alert alert-danger">';
                $.each(errors, function(key, val) {
                    msg += '<p class="mb-0">' + val[0] + '</p>';
                });
                msg += '</div>';
                $('#alertEdit').html(msg);
            }
        });
    });

    // Hapus user dengan AJAX DELETE
    function deleteUser(id) {
        if (confirm('Yakin hapus user ini?')) {
            $.ajax({
                url: '/api/v1/users/' + id,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    loadUsers();
                    alert('User berhasil dihapus!');
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                    alert('Gagal menghapus user!');
                }
            });
        }
    }

    // Load data saat halaman dibuka
    $(document).ready(function() {
        loadUsers();
    });
</script>
@endpush

@endsection