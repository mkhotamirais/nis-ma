<?php

return [
    "header" => [
        "menuadmin" => [
            ["href" => "/dashboard", "label" => "Dashboard", "route" => "dashboard"],
            ["href" => "/users", "label" => "Users", "route" => "users"],
            ["href" => "/news", "label" => "Berita", "route" => "news.index"],
            ["href" => "/agendas", "label" => "Agenda", "route" => "agendas.index"],
            ["href" => "/galeries", "label" => "Galeri", "route" => "galeries.index"],
            ["href" => "/achievements", "label" => "Prestasi", "route" => "achievements.index"],
        ],
        "menu" => [
            ["href" => "/ppdb", "label" => "PPDB"],
            ["href" => "/", "label" => "beranda"],
            [
                "href" => "#",
                "label" => "profile",
                "submenu" => [
                    ["href" => "/sambutan", "label" => "Sambutan Kepala Madrasah"],
                    ["href" => "/sejarah", "label" => "Sejarah"],
                    ["href" => "/visi-misi-tujuan", "label" => "Visi, Misi, dan Tujuan"],
                    ["href" => "/guru-staff", "label" => "Guru dan Staff"],
                    ["href" => "/mars-hymne", "label" => "Mars & Hymne"],
                ]
            ],
            [
                "href" => "#",
                "label" => "Publikasi",
                "submenu" => [
                    ["href" => "/prestasi", "label" => "Prestasi"],
                    ["href" => "/agenda", "label" => "Agenda"],
                    ["href" => "/berita", "label" => "Berita"],
                    ["href" => "/galery", "label" => "Galery"],
                ]
            ]
        ]
    ],
    "footer" => [
        "links" => [
            ["href" => "#", "label" => "PPDB"],
            ["href" => "#", "label" => "Tentang Sekolah"],
            ["href" => "#", "label" => "Hubungi Kami"],
        ],
        "other-links" => [
            ["href" => "#", "label" => "Ponpes Nurul Iman"],
            ["href" => "#", "label" => "RA Nurul Iman"],
            ["href" => "#", "label" => "MTS Nurul Iman"],
            ["href" => "#", "label" => "MA Nurul Iman"],
        ],
    ],
    "common" => [
        "moto" => "Lembur ilmu, Majelis disiplin, Kancah ibadah dan Wahana perjuangan",
        "moto2" => "Nurul Iman tempat orang baik dan orang orang yang ingn menjadi baik",
        "address" => "Kp. Bangong Rt 02/01, Desa Pasirpogor, Kec. Sindangkerta, Kab. Bandung Barat, Jawa Barat, 40563",
        "foundation-name" => "Yayasan Pendidikan H. Abdul Halim H. Abdul Salam",
        "links" => [
            "instagram-ma" => ["label" => "ma_nurul_iman", "href" => "https://www.instagram.com/ma_nurul_iman/"],
            "facebook-ma" => ["label" => "Ma Nurul Iman Sindangkerta", "href" => "https://www.facebook.com/manurulimansindangkerta/"],
            "youtube-ma" => ["label" => "Ma Nurul Iman Sindangkerta", "href" => "https://www.youtube.com/@manurulimansindangkerta8640"],
            "website-ma" => ["label" => "nis.sch.id", "href" => "https://nis.sch.id"],
            "instagram-osis-ma" => ["label" => "osis.ma.nuruliman", "href" => "https://www.instagram.com/osis.ma.nuruliman"],
            "instagram-pramuka-ma" => ["label" => "pramuka.manis", "href" => "https://www.instagram.com/pramuka.manis/"],
            "wa-url-m-nur" => ["label" => "081809299580", "href" => "https://wa.me/6281809299580"],
            "email-url" => ["label" => "nuruliman@gmail.com", "href" => "https://mailto:nuruliman@gmail.com"]
        ],
    ],
    "home" => [
        "hero" => [
            "welcome" => "Selamat Datang di MA Nurul Iman Sindangkerta",
            "register-btn" => "Pendaftaran",
            "about-btn" => "Tentang Sekolah",
        ],
        "speech" => [
            "title" => "Sambutan Kepala Madrasah",
            "principal-name" => "Jaeni Marjuki, M.Ag",
            "speech" => [
                // "Assalamualaikum Warahmatullahi Wabarakatuh",
                // "Alhamdulillah, segala puji bagi Allah SWT yang telah memberikan kita nikmat iman, ilmu, dan kesehatan sehingga kita dapat berkumpul dalam kesempatan yang berbahagia ini. Shalawat serta salam senantiasa kita haturkan kepada Nabi Muhammad SAW, semoga kita semua mendapat syafaatnya di yaumul akhir nanti.",
                // "Saya selaku Kepala Sekolah Nurul Iman mengucapkan selamat datang kepada seluruh hadirin, baik para guru, siswa, orang tua, serta tamu undangan yang telah berkenan hadir. Sekolah ini senantiasa berkomitmen untuk menjadi lembaga pendidikan yang tidak hanya unggul dalam ilmu pengetahuan, tetapi juga menanamkan nilai-nilai akhlak dan keislaman dalam setiap aspek kehidupan.",
                // "Kami percaya bahwa pendidikan adalah kunci utama dalam membentuk generasi yang cerdas, berkarakter, dan berdaya saing. Oleh karena itu, kami terus berupaya meningkatkan kualitas pembelajaran, baik dari segi akademik maupun non-akademik, agar para siswa dapat berkembang secara maksimal sesuai dengan potensinya.",
                // "Harapan kami, dengan adanya kerja sama antara pihak sekolah, orang tua, dan masyarakat, kita dapat menciptakan lingkungan belajar yang kondusif serta melahirkan generasi yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak yang mulia dan siap menghadapi tantangan zaman.",
                // "Akhir kata, semoga Allah SWT senantiasa meridhoi langkah kita dalam menuntut ilmu dan membangun pendidikan yang lebih baik. Terima kasih atas dukungan dan kepercayaan yang diberikan kepada Nurul Iman.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi at recusandae minima, sequi ducimus optio molestiae repellat perspiciatis sed aperiam.",
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi at recusandae minima, sequi ducimus optio molestiae repellat perspiciatis sed aperiam.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi."
            ]
        ],
        "reason" => [
            "title" => "Mengapa MA Nurul Iman",
            "description" => "Sekolah yang sangat menjunjung tinggi sopan santun dan mengutamakan akhlak yang baik menghindari akhlak tercela",
            "reasons" => [
                ["title" => "alasan 1", "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus lorem dolor sit amet consectetur adipisicing elit. Quos, natus.", "image" => "https://images.pexels.com/photos/1310102/pexels-photo-1310102.jpeg?auto=compress&cs=tinysrgb&w=600"],
                ["title" => "alasan 2", "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus.", "image" => "https://images.pexels.com/photos/1310102/pexels-photo-1310102.jpeg?auto=compress&cs=tinysrgb&w=600"],
                ["title" => "alasan 3", "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus.", "image" => "https://images.pexels.com/photos/1310102/pexels-photo-1310102.jpeg?auto=compress&cs=tinysrgb&w=600"],
            ],
            "numbers" => [
                ["number" => "100", "name" => "Siswa"],
                ["number" => "500", "name" => "Alumni"],
                ["number" => "50", "name" => "Tenaga Pendidik"],
                ["number" => "30", "name" => "Tenaga Pendidikan"],
            ]
        ],
        "galery" => [
            "title" => "Galery",
            "description" => "Koleksi foto yang mengabadikan momen berharga, kegiatan, prestasi, serta fasilitas sekolah dalam tampilan menarik dan penuh makna."
        ],
        "news" => [
            "title" => "Berita Terkini",
            "description" => "Berita terbaru dan aktual tentang kegiatan, prestasi, serta perkembangan sekolah yang informatif dan inspiratif."
        ],
        "event" => [
            "title" => "Program Terkini",
            "description" => "Kegiatan terbaru dan aktual tentang kegiatan, prestasi, serta perkembangan sekolah yang informatif dan inspiratif."
        ],
    ],
    "profile" => [
        "menu" => [
            ["href" => "#latar-belakang", "label" => "Latar Belakang"],
            ["href" => "#sejarah", "label" => "Sejarah"],
            ["href" => "#visi-misi", "label" => "Visi dan Misi"],
            ["href" => "#mars-hymne", "label" => "Mars & Hymne"],
        ]
    ]

];
