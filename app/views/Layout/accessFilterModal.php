<div class="modal fade" id="accessFilterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unauthorized access</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= $_GET['error'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php
        if(isset($_GET['error'])){
        ?>
       <script>
            let filterAccessModal = new bootstrap.Modal(document.getElementById('accessFilterModel'), {});
            filterAccessModal.show();
        </script>
        <?php
        }
        ?>