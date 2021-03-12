let headerTemplate = '';
headerTemplate = `<div class="row">
<div class="col-9">
<h1 class="display-4 text-center">${student[0][1]}</h1>
</div>
<div class="col-3">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link active logout" href="logout.php?logout=1"><img src="images/logout.png" title="logout">
</li>
</ul>
</div>
</div>`;
document.querySelector('.header-container').innerHTML+=headerTemplate;


//student Table
let studentTemplate = `<table class="table table-striped">
<thead class="thead-dark">
  <tr>
    <th scope="col">USN</th>
    <th scope="col">Name</th>
    <th scope="col">SEM</th>
    <th scope="col">PH NO.</th>
    <th scope="col">ADDRESS</th>
    <th scope="col">ACTION</th>
  </tr>
</thead>
<tbody class="student-tuple">
</tbody>
</table>`;

document.querySelector('.student-container').innerHTML+=studentTemplate;

let studentTuple = '';
  studentTuple+=`<tr>
  <th scope="row">${student[0][1]}</th>
  <td>${student[0][0]}</td>
  <td>${student[0][2]}</td>
  <td>${student[0][4]}</td>
  <td>${student[0][3]}</td>
  <td><a class="btn btn-primary" href="#student-form" style="color:white;">Update</a></td>
`;

document.querySelector('.student-tuple').innerHTML+=studentTuple;

document.querySelector('.update-student').innerHTML = `
<form class="login-form" action="studentDetail.php" method="post">
  <div class="form-group">
    <h1 style="font-size:30px;">UPDATE STUDENT</h1>
    <label for="student-name">Name</label>
    <input type="text" class="form-control"  id="student-name" name="student-name" value="${student[0][0]}" required>
  </div>
  <div class="form-group">
    <label for="student-sem">Semester</label>
    <input type="text" class="form-control" id="student-sem" name="student-sem" value="${student[0][2]}" required>
  </div>
  <div class="form-group">
    <label for="student-phone">Phone Number</label>
    <input type="text" class="form-control" id="student-phone" name="student-phone" value="${student[0][4]}" required>
  </div>
  <div class="form-group">
    <label for="student-address">Address</label>
    <input type="text" class="form-control" id="student-address" name="student-address" value="${student[0][3]}" required>
  </div>
  <button type="submit" class="btn btn-primary" name="btn-update-student">UPDATE</button>
</form>`;



//dependent Table
let dependentTemplate = `<table class="table table-striped">
<thead class="thead-dark">
  <tr>
    <th scope="col">Parent Name</th>
    <th scope="col">Email</th>
    <th scope="col">PhNo</th>
    <th scope="col">ADDRESS</th>
    <th scope="col">ACTION</th>
  </tr>
</thead>
<tbody class="dependent-tuple">
</tbody>
</table>`;

document.querySelector('.dependent-container').innerHTML+=dependentTemplate;

let dependentTuple = '';
  dependentTuple+=`<tr>
  <th scope="row">${dependent[0][0]}</th>
  <td>${dependent[0][1]}</td>
  <td>${dependent[0][2]}</td>
  <td>${dependent[0][3]}</td>
  <td><a class="btn btn-primary" href="#dependent-form" style="color:white;">Update</a></td>
`;

document.querySelector('.dependent-tuple').innerHTML+=dependentTuple;



//marks Table
let marksTemplate = `<table class="table table-striped">
<thead class="thead-dark">
  <tr>
    <th scope="col">ia_final</th>
    <th scope="col">ia 1</th>
    <th scope="col">ia 2</th>
    <th scope="col">ia 3</th>
    <th scope="col">External Marks</th>
    <th scope="col">Subject Code</th>
    <th scope="col">ACTION</th>
  </tr>
</thead>
<tbody class="marks-tuple">
</tbody>
</table>`;

document.querySelector('.marks-container').innerHTML+=marksTemplate;

let marksTuple = '';
for(let i=0;i<marks.length;i++) {
  marksTuple+=`<tr>
  <th scope="row">${marks[i][0]}</th>
  <td>${marks[i][1]}</td>
  <td>${marks[i][2]}</td>
  <td>${marks[i][3]}</td>
  <td>${marks[i][4]}</td>
  <td>${marks[i][6]}</td>
  <td><a class="btn btn-primary" style="color:white;">Update</a></td>
`;
}

document.querySelector('.marks-tuple').innerHTML+=marksTuple;



document.querySelector('.update-dependent').innerHTML = `
<form class="login-form" action="studentDetail.php" method="post">
  <div class="form-group">
    <h1 style="font-size:30px;">UPDATE PARENT</h1>
    <label for="dependent-name">Name</label>
    <input type="text" class="form-control" id="dependent-name" name="dependent-name" value="${dependent[0][0]}" required>
  </div>
  <div class="form-group">
    <label for="dependent-email">Email</label>
    <input type="email" class="form-control" id="dependent-email" name="dependent-email" value="${dependent[0][1]}" required>
  </div>
  <div class="form-group">
    <label for="dependent-phone">Phone Number</label>
    <input type="text" class="form-control" id="dependent-phone" name="dependent-phone" value="${dependent[0][2]}" required>
  </div>
  <div class="form-group">
    <label for="dependent-address">Address</label>
    <input type="text" class="form-control" id="dependent-address" name="dependent-address" value="${dependent[0][3]}" required>
  </div>
  <button type="submit" class="btn btn-primary" name="btn-update-dependent">UPDATE</button>
</form>`;









