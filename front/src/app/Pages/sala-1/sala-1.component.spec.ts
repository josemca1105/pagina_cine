import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Sala1Component } from './sala-1.component';

describe('Sala1Component', () => {
  let component: Sala1Component;
  let fixture: ComponentFixture<Sala1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Sala1Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Sala1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
