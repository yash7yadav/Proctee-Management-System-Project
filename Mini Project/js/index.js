let headerTemplate = '';
headerTemplate = `<div class="row">
<div class="col-10">
<h1 class="display-4 text-center">${proctorName[0][0]}</h1>
</div>
<div class="col-2">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link active logout" href="logout.php?logout=1"><img src="images/logout.png" title="logout">
</li>
</ul>
</div>
</div>`;
document.querySelector('.header-container').innerHTML=headerTemplate;

let template='';
for(let i=0;i<studentDetails.length;i++) {
template += `<div class="col"><div class="card" style="width: 18rem;">
<div class="card-body">
  <h5 class="card-title">${studentDetails[i][1]}</h5>
  <p class="card-text">${studentDetails[i][0]}</p>
  <a href="studentDetail.php?email_id=${proctorName[0][1]}&student_usn=${studentDetails[i][1]}" class="btn btn-primary">Details</a>
  <a href="index.php?delete_usn=${studentDetails[i][1]}" class="btn btn-danger">Delete</a>
</div>
</div></div>`;
}

document.querySelector('.card-container').innerHTML=template;

document.querySelector('.form-container').innerHTML = `
<form class="login-form" action="index.php" method="post">
  <div class="form-group">
    <h1 style="font-size:30px;">ADD PROCTEE</h1>
    <label for="newStudent-usn">Usn</label>
    <input type="text" class="form-control" id="newStudent-usn" name="newStudent-usn" required>
  </div>
  <div class="form-group">
    <label for="newStudent-name">Name</label>
    <input type="text" class="form-control" id="newStudent-name" name="newStudent-name" required>
  </div>
  <div class="form-group">
    <label for="newStudent-sem">Semester</label>
    <input type="text" class="form-control" id="newStudent-sem" name="newStudent-sem" required>
  </div>
  <div class="form-group">
    <label for="newStudent-phone">Phone Number</label>
    <input type="text" class="form-control" id="newStudent-phone" name="newStudent-phone" required>
  </div>
  <div class="form-group">
    <label for="newStudent-address">Address</label>
    <input type="text" class="form-control" id="newStudent-address" name="newStudent-address" required>
  </div>
  <button type="submit" class="btn btn-primary" name="btn-add-proctee">ADD PROCTEE</button>
</form>
`