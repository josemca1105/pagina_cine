import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SalasPageComponent } from './salas-page.component';

describe('SalasPageComponent', () => {
  let component: SalasPageComponent;
  let fixture: ComponentFixture<SalasPageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SalasPageComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(SalasPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
