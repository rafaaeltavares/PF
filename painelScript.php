<?php
        $acesso = isset($_SESSION['status_visita']);
      ?>
      <script>
      const acesso = '<?php echo $acesso; ?>'

      if(acesso){
          

        const link = document.getElementById('mc')
        const link1 = document.getElementById('cm')

        const posts = document.getElementById('ps')
        const posts1 = document.getElementById('sp')

        link.addEventListener('click',function(e){
          link.classList.add('nãoClicar')
          e.preventDefault();

          
          
        })
        link1.addEventListener('click',function(e){
          e.preventDefault();
        })

        posts.addEventListener('click',function(e){
          e.preventDefault();
        })
        posts1.addEventListener('click',function(e){
          e.preventDefault();
        })
      }
      </script>
