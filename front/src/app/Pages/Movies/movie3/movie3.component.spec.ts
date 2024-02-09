import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Movie3Component } from './movie3.component';

describe('Movie3Component', () => {
  let component: Movie3Component;
  let fixture: ComponentFixture<Movie3Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Movie3Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Movie3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
