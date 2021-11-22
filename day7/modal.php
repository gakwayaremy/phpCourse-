
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStream">
  Add Strem
</button>

<!-- Modal -->
<div class="modal fade" id="addStream" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Stream</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form action="server.php" method="POST">
      		<input class="form-control" type="text" name="sname">
      		<br>
      		<input class="form-control" type="te" name="sdescri">
      		<br>
      		<input class="d-flex justify-content-right btn btn-primary w-4" type="submit" name="anstream" value="add" data-bs-dismiss="modal">
      	</form>
      </div>
    </div>
  </div>
</div>