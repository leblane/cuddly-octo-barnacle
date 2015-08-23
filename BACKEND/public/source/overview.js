var Overview = function() {
};

Overview.prototype.Preload = function(phaser) {
    phaser.load.image('overview', 'assets/images/overview.png');
};

Overview.prototype.Create = function(phaser) {
    this.tilemap = phaser.add.tilemap();
    this.tilemap.addTilesetImage('overview', null, 16, 16);
    this.layer1 = this.tilemap.create('layer1', 100, 100, 16, 16);
    this.layer1.resizeWorld();
    this.loadedWorld = false;
    promise.post('/block/grid', {X: 32760, Y: 32760, W: 8, H: 8}).then(function(error, text, xhr) {
        console.log(text);
    });
};

Overview.prototype.Update = function(phaser) {
};

Overview.prototype.DrawWorld = function() {
    for(var y = 0; y < 8; ++y) {
        for(var x = 0; x < 8; ++x) {
            this.tilemap.putTile(3, x * 4 + 1, y * 4 + 1);
            this.tilemap.putTile(3, x * 4 + 2, y * 4 + 1);
            this.tilemap.putTile(3, x * 4 + 3, y * 4 + 1);

            this.tilemap.putTile(3, x * 4 + 1, y * 4 + 2);
            this.tilemap.putTile(4, x * 4 + 2, y * 4 + 2);
            this.tilemap.putTile(3, x * 4 + 3, y * 4 + 2);

            this.tilemap.putTile(3, x * 4 + 1, y * 4 + 3);
            this.tilemap.putTile(3, x * 4 + 2, y * 4 + 3);
            this.tilemap.putTile(3, x * 4 + 3, y * 4 + 3);
        }
    }

    /* Draw roads */
    for(var y = 0; y < 8; ++y) {
        for(var x = 0; x < 8; ++x) {
             this.tilemap.putTile(2, x * 4 + 0, y * 4);
             this.tilemap.putTile(0, x * 4 + 1, y * 4);
             this.tilemap.putTile(0, x * 4 + 2, y * 4);
             this.tilemap.putTile(0, x * 4 + 3, y * 4);

             this.tilemap.putTile(1, x * 4, y * 4 + 1);
             this.tilemap.putTile(1, x * 4, y * 4 + 2);
             this.tilemap.putTile(1, x * 4, y * 4 + 3);
        }
    }
};
