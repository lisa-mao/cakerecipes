let checkbox = document.querySelector("#chocolate")
let fruity = document.querySelector("#fruity")

const buttons = document.querySelectorAll(".category-button")


buttons.forEach(button => {
    const input = document.getElementById(button.getAttribute('for'))

    button.addEventListener("click", (e) => {
        e.preventDefault()

        button.classList.toggle('active')

        if (input){
            /* boolean operator if input = checked then uncheck zelfde omgedraait */
            input.checked = !input.checked
        }
    })
})

// checkbox.addEventListener("click", clicked)
//      function clicked(){
//     console.log(checkbox.value)
//  }
//
//  fruity.addEventListener("click", toggle)
//
// function toggle(){
//
//
//     if (fruity.classList.contains("toggled")){
//         console.log("removing class")
//         fruity.classList.remove("toggled")
//         fruity.value = ""
//         console.log(fruity.value)
//     } else {
//         fruity.classList.add("toggled")
//         console.log("added class")
//         fruity.value = "fruity"
//         console.log(fruity.value)
//     }
// }
