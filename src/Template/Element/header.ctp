<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link($this->Html->image('logo.png', ['alt' => 'Trainer Link']), 
                                                                                        ['controller' => 'Pages',
                                                                                            'action' => 'Display'
                                                                                        ],
                                                                                        ['escape' => false,
                                                                                         'class'=>'navbar-brand scroll-top logo'
                                                                                        ]) ?>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                    <li><a href="#">Ajuda</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><?= $this->Html->link(__('Área do treinador'), ['controller' => 'Users', 'action' => 'login']) ?></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</header>
<!--/.header-->