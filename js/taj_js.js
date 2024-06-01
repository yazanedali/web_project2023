// function addStudent() {
//   var table = document.querySelector("table tbody");
//   var newRow = table.insertRow(table.rows.length);
//   newRow.classList.add("new-student");
//
//   var cell1 = newRow.insertCell(0);
//   var cell2 = newRow.insertCell(1);
//   var cell3 = newRow.insertCell(2);
//   var cell4 = newRow.insertCell(3);
//   var cell5 = newRow.insertCell(4);
//
//   // Add the class 'new-student' to the input elements for the new student
//   cell1.innerHTML =
//     '<input type="text" placeholder="اسم الطالب" style="border: none; height: 40px;">';
//   cell2.innerHTML =
//     '<input type="text" placeholder="رقم الهاتف" style="border: none; height: 40px;">';
//   cell3.innerHTML =
//     '<input type="text" placeholder="رقم هاتف ولي الأمر" style="border: none; height: 40px;">';
//   cell4.innerHTML =
//     '<input type="text" placeholder="ملاحظات" style="border: none; height: 40px;">';
//   cell5.innerHTML =
//     '<img src="img/icons8-setting-50.png" alt="" style="width: 24px; height: 24px;" onclick="editStudent()"> <img src="img/icons8-delete-24.png" alt="" onclick="deleteStudent()"> <button class="confirm-button" onclick="confirmStudent()">تأكيد</button>';
// }
//
// function editStudent() {
//   var inputElements = document.querySelectorAll(".new-student input");
//   inputElements.forEach(function (input) {
//     input.removeAttribute("readonly");
//   });
//   alert("يمكنك الآن تعديل بيانات الطالب!");
// }
//
// function deleteStudent() {
//   var table = document.querySelector("table tbody");
//   var rowToDelete = document.querySelector(".new-student");
//   table.removeChild(rowToDelete);
//   alert("تم حذف الطالب!");
// }
//
// function confirmStudent() {
//     var inputElements = document.querySelectorAll('.new-student input');
//     var confirmedText = '';
//
//     inputElements.forEach(function (input) {
//         input.setAttribute('readonly', 'true');
//         confirmedText += input.value + ' ';
//     });
//
//     alert('تم تأكيد بيانات الطالب!');
// }
