const slides = document.querySelectorAll(".slide")
var counter = 0;

slides.forEach(
    (slide, index) => {
        slide.style.left = `${index * 100}%`
    }
)


const goPrev = () =>{
    if(counter==0)
    {
        counter=num
    }
    else{
        counter--
    }
    slideImage()
}

const goNext = () =>{
    if(counter==num)
    {
        counter=0
    }
    else{
        counter++
    }
    slideImage()
}
const slideImage = () => {
    slides.forEach(
        (slide) => {
            slide.style.transform = `translateX(-${counter * 100}%)`
        }
    )
}