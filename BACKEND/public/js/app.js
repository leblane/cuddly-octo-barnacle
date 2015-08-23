var Game = function() {
};

Game.prototype.Run = function() {
    this.overview = new Overview();
    this.in_overview = true;
    this.phaser = new Phaser.Game(800, 600, Phaser.AUTO, '', { preload: this.preload, create: this.create, update: this.update });
};

Game.prototype.Preload = function() {
    this.overview.Preload(this.phaser);
};

Game.prototype.Create = function() {
    this.overview.Create(this.phaser);
};

Game.prototype.Update = function() {
    if(this.in_overview) {
        this.overview.Update(this.phaser);
    }
};

var game = new Game();
game.Run();

var Overview = function() {
};

Overview.prototype.Preload = function(phaser) {
    phaser.load.image('images/overview.png');
};
