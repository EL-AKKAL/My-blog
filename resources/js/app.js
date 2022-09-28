import './bootstrap';
  // changing the display of each post on home page
  const PostItems = document.querySelectorAll('.post-item');
  let Louper = 0;

  if (PostItems != null && PostItems !=undefined) {
      
      PostItems.forEach( element => {

          element.classList.remove(element.classList[1]);
          Louper++;

          switch (Louper) {
            case 4:
            case 5:
                element.classList.add('md:w-1/2');
                    break;
            case 6:
                element.classList.add('md:w-2/3');
                    break;
            default:
                element.classList.add('md:w-1/3');
                    break;
          }
      });
  }