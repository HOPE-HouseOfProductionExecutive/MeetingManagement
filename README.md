# MeetingManagement

**Cara Pemakaian**
- Fork Repositorynya (ada tulisan fork di sebelah kanan atas, sebelah watch)
- Terus forknya di clone pake SSH codenya (git clone *link ssh-nya*)
- Abis itu balik ke repository utama (***Bukan yang fork punya lu***) trus copy SSH-nya
- Buka git bash di dalem file yang uda lu clone trus tulis **git remote add upstream (*link ssh utama*)**
- 
- Kalo mau buat fitur baru ***git branch (nama-fitur-jangan-di-spasi)***
- Abis itu ***git checkout (nama-fitur-jangan-di-spasi)*** -> namanya harus sama kayak sebelumnya
- **Jangan Lupa tiap kali mau ngerjain di pull -> git pull upstream main**
- Kalo udah kelar ngodingnya -> ***git add -A***
- Abis itu git commit -m "*tulis description*"
- Abis kelar commit pindah ke yang awal *git checkout main* (ini bakal balik ke master fork punya lu dan smua editan lu bakal ilang tapi jangan panik)
- Lu merge branch yang lu edit sebelumnya sama master fork lu caranya ***git merge (nama-branchnya-yang-dari-sebelumnya) --no-ff***
- Baru ***git push origin main***
- Kalo ntar udah gw merge delete branchnya yang tadi ***git branch -d (nama-branch)***
