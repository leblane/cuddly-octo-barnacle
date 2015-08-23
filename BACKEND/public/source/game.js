var Game = function() {
};

Game.prototype.Run = function() {
    this.overview = new Overview();
    this.in_overview = true;
    this.phaser = new Phaser.Game(1024, 728, Phaser.AUTO, '', { preload: this.Preload.bind(this), create: this.Create.bind(this), update: this.Update.bind(this) });
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
