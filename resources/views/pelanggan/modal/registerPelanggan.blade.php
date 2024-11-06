  <!-- Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title fs-5" id="registerModalLabel">Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="/inputuser" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="modal-body">
                      <div class="mb-3 row">
                          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-9">
                              <input type="text" name="name" class="form-control" id="nama" value=""
                                  placeholder="Masukkan email Anda">
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-9">
                              <input type="text" name="email" class="form-control" id="email" value=""
                                  placeholder="Masukkan email Anda">
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" id="password" value=""
                                  placeholder="Masukkan password Anda">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-success col-sm-12">Register</button>
              </form>
              <p class="m-auto text-center p-2" style="font-size:12px">Jika belum ada akun register sekarang!</p>
              <button type="button" class="btn btn-danger col-sm-12" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
  </div>
